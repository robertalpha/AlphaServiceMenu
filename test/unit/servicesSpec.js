'use strict';

describe('service', function() {

  // load modules
  beforeEach(module('kumuApp'));

  // Test service availability
  it('check the existence of json service factory', inject(function(Servicelisting) {
      expect(Servicelisting).toBeDefined();
    }));

    // Test service availability
  it('check the existence of php server source factory', inject(function(Server) {
      expect(Server).toBeDefined();
    }));
});